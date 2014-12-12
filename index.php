<?php
/**
 * Create By: AS
 * Date: 11/12/14
 * Time: 1:34 AM
 */

//load all function in folder

function __autoload($class_name) {
    if(file_exists($class_name . '.php')) {
        require_once($class_name . '.php');
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}
//if (isset($_REQUEST['url'])){exit;}


/* testing : api = app , appi


*/
error_reporting(E_ALL ^ E_NOTICE);



//$strapp='{"act":"app","s":1,"dt":{"appid":"MobNavSales","appname":"MobNavSales","icon":null,"rate":null,"catid":"chat","catname":null,"userid":"made","ufirstname":"Agus","ulastname":"Made","packageid":null,"packagename":null,"chatid":0,"expire":"2014-12-08 23:54:45.684406","description":"Mob Nav Sales","price_idr":null,"price_usd":null,"shortdesc":"Mob Nav Sales","completestep":1,"config":{"appdefpg":false},"createdate":"2014-11-08 23:54:45.684406","lastupdate":"2014-11-08 23:54:45.684406"}}';

$u ='http://'. $_REQUEST['url'].'&'.'appid='.$_REQUEST['appid'];


// Check per each req to set default template requirement

if ($_REQUEST['api']='app')
{

   /* format  : ?url=http://apptomatik.dev/app2/?app=app
   mandatory key :
    appid
    appname,
    icon
    userid
    description
    createdate*/

    $strapp='{"appid":"MobNavSales","appname":"MobNavSales","icon":null,"userid":"made","description":"Mob Nav Sales","createdate":"create date"}';

}
elseif ($_REQUEST['api']='template')
{

    /* testing : api = app , appi
       format  : ?url=http://apptomatik.dev/app2/?app=template
       mandatory key :
        id
        name,
        clonable,

    */

    $strapp='{"id":"MobNavSales","name":"MobNavSales","clonable":null}';
}
else
{
    $strapp='{"id":"id"}';
}

//--------------------

$ck=new api_app();
$x=$ck->api_app_appid($u);


echo 'Result Test : '.$u,'<br>';

if ($x==true)
{
    echo 'Json Output Format  : Validated' ,'<br>';
}
else
{
    echo 'Json Output Format  : Invalid Format , Please check again' ,'<br>';
    exit;
}


//if json format validate , check content of file compare with mandatory key from default each pages

$strget = file_get_contents($u);
$arr1 = json_decode($strapp,true);
$arr2 = json_decode($strget,true);

//echo print_r($arr1),'<br>';
//echo print_r($arr2),'<br>';

//echo $ck->findKey($arr2,'app');
//exit;

$validate_result = $ck->findarray($arr1,$arr2);


/*
 * end of api =app
 */


