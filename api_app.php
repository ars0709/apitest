<?php
/**
 * api_app = validate output from apptomatik/app2/?api
 * contents :
 *          appid = Required
 *          app =
 *
 * Created by : AS
 * Date: 11/12/14
 * Time: 1:48 AM
 */
//require(dirname(__file__).'/../jsonhandle.php');

class api_app extends jsonhandle
{

    public $success;

    public function api_app_appid($url)
    {
        $json_string = file_get_contents($url);

        //first validate the output is json
        $jh = new jsonhandle();

        //echo(print_r($jh->decode($y)));

        if ($jh->isJSON($json_string))
            {

                return $x = true;
            }
        else
            {
                return $x = false;
            }
    }


    function findKey($array, $keySearch)
    {
        // check if it's even an array
        if (!is_array($array)) return false;

        // key exists
        if (array_key_exists($keySearch, $array)) return true;

        // key isn't in this array, go deeper
        foreach($array as $key => $val)
        {
            // return true if it's found
            if ($this->findKey($val, $keySearch)) return true;
        }

        return false;
    }





    function findarray($array,$arraycompare)
    {

        $srch = '';


        foreach ($array as $key => $value)
        {
            if (is_array($value))
            {
                $this->findarray($value, $arraycompare);
            }
            else
            {
                //It is not an array, so print it out.
               // echo $key, '<br>';

                //echo print_r($this->findKey($arraycompare, $key)),'<br>';


                    echo $key;
                    echo ($this->findKey($arraycompare, $key)) ? ' Validate ' :' unvalidate ','<br>';


            }
        }

        return $srch;

    }

}