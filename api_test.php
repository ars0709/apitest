<?php
/**
 * Created by AS.
 * Date: 12/12/14
 * Time: 11:19 AM
 */

class api_test extends api_app
{


    public function get_api_test ($url,$app,$appid,$api)
    {
        switch ($api)
        {
            case 'app':
                /* format  : ?url=http://apptomatik.dev/app2/?app=app
                   mandatory key :
                    appid
                    appname,
                    icon
                    userid
                    description
                    createdate*/

                $strapp = '{"appid":"MobNavSales","appname":"MobNavSales","icon":null,"userid":"made","description":"Mob Nav Sales","createdate":"create date"}';
                break;

            case 'template':
                /* testing : api = app , appi
                       format  : ?url=http://apptomatik.dev/app2/?app=template
                       mandatory key :
                        id
                        name,
                        clonable,

                    */

                $strapp = '{"id":"MobNavSales","name":"MobNavSales","clonable":null}';
                break;
            case 'page':
            default :
                echo 'undefine tipe';

        }



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

        $ck->findarray($arr1,$arr2);



    }
}