<?php
namespace App\Controller\Component;
use App\Controller\AppController;
use cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

class CommonComponent extends Component
{
    public function generateRandomString($length = 10)
    {
        $characters 		= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength  = strlen($characters);
        $randomString 		= '';

        for ($i = 0; $i < $length; $i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function uploadFile($fDetail, $path) {
        $getTimeStamp = "";
        if($fDetail['name'] != '') {
            $fName = $fDetail['name'];
            $fSize = $fDetail['size'];
            $tmpName = $fDetail['tmp_name'];
            $getTimeStamp = $this->getTimeStampNumber();
            $aFnameDetail = $this->seperateFnameAndExt($fName);

            $refName = $this->concat($getTimeStamp, $aFnameDetail);
            move_uploaded_file($tmpName,$path.DS.$refName);

            $data['refName'] = $refName;
            $data['fName'] = $fName;
            $data['fSize'] = $fSize;
            $data['fExt'] = $aFnameDetail['ext'];
            return $data;
        } else {
            //$this->Session->setFlash('Error Uploading');
        }
    }
    public function seperateFnameAndExt($fName) {
        $extention =  substr($fName, strrpos($fName,'.'));
        $extLenght = strlen($extention);
        $fnameWithOutExt = substr($fName, 0, -$extLenght);
        return array('fNameWOExt' => $fnameWithOutExt, 'ext' => strtolower($extention));
    }

    public function getTimeStampNumber() {
        return $timeStamp = rand().mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
    }

    public function concat($fileName, $aFnameData) {
        return trim($fileName.$aFnameData['ext']);
    }

    // Unlink  a file
    public function unlinkFile($filename, $path) {

        if(isset($filename) && !empty($filename)) {
            unlink($path."/".$filename);
        } else {
            //$this->Session->setFlash('Error Removing File');
        }
    }



    function removeFromString($str, $item) {
        $parts = explode(',', $str);

        while(($i = array_search($item, $parts)) !== false) {
            unset($parts[$i]);
        }
        return implode(',', $parts);
    }

    function seoUrl($string)
    {

        $text = preg_replace('~[^\\pL\d]+~u', '-', $string);

        // trim
        $text = trim($text, '-');

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if(strlen($text) > 70) {
            $text = substr($text, 0, 70);
        }

        if (empty($text))
        {
            //return 'n-a';
            return time();
        }

        return $text;
    }

    /**
     * Site::common_ajax_pagination()
     *
     * @param mixed $total_pages
     * @param mixed $limit
     * @param mixed $page
     * @param mixed $functionname
     * @return
     */
    function common_ajax_pagination($total_pages,$limit,$page,$functionname)
    {
        $adjacents = 1;
        /* Setup page vars for display. */          //if no page var is given, default to 1.
        $prev = $page - 1;                          //previous page is page - 1
        $next = $page + 1;                          //next page is page + 1
        $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;                      //last page minus 1

        #$revcnt = (isset($_REQUEST['findcont_reviewcount']) && !empty($_REQUEST['findcont_reviewcount']))?$_REQUEST['findcont_reviewcount']:"''";

        /*
            Now we apply our rules and draw the pagination object.
            We're actually saving the code to a variable in case we want to draw it more than once.
        */
        $pagination = "";
        if($lastpage > 1)
        {
            $pagination .= "<ul class=\"pagination\">";

            //previous button
            if ($page > 1) {
                $pagination.= "<li><a onclick=\"$functionname(1);\" href=\"javascript:void(0)\">&laquo;</a></li>";
                $pagination.= "<li><a onclick=\"$functionname($prev);\" href=\"javascript:void(0)\">&lt;</a></li>";
            }
            else{
                #$pagination.= "<span class=\"disabled\" title=\"First\">&laquo;</span>";
                #$pagination.= "<span class=\"disabled\">&lt;</span>";
            }

            //pages
            if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li class=\"active\"><span >$counter</span></li>";
                    else

                        $pagination.= "<li><a onclick=\"$functionname($counter);\" href=\"javascript:void(0)\">$counter</a></li>";
                }
            }
            elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li class=\"active\"><span >$counter</span></li>";
                        else
                            $pagination.= "<li><a onclick=\"$functionname($counter);\" href=\"javascript:void(0)\">$counter</a></li>";
                    }
                    $pagination.= "<li><a>...</a></li>";
                    $pagination.= "<li><a onclick=\"$functionname($lpm1);\" href=\"javascript:void(0)\">$lpm1</a></li>";
                    $pagination.= "<li><a onclick=\"$functionname($lastpage);\" href=\"javascript:void(0)\">$lastpage</a></li>";
                }
                //in middle; hide some front and some back
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination.= "<li><a onclick=\"$functionname(1);\" href=\"javascript:void(0)\">1</a></li>";
                    #$pagination.= "<li><a onclick=\"ajaxSearchFindContractor(2);\" href=\"javascript:void(0)\">2</a></li>";
                    $pagination.= "<li><a>...</a></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li class=\"active\"><span >$counter</span></li>";
                        else{
                            $pagination.= "<li><a onclick=\"$functionname($counter);\" href=\"javascript:void(0)\">$counter</a></li>";
                        }
                    }
                    $pagination.= "<li><a>...</a></li>";
                    $pagination.= "<li><a  onclick=\"$functionname($lpm1);\" href=\"javascript:void(0)\">$lpm1</a></li>";
                    $pagination.= "<li><a  onclick=\"$functionname($lastpage);\" href=\"javascript:void(0)\">$lastpage</a></li>";
                }
                //close to end; only hide early pages
                else
                {
                    $pagination.= "<li><a onclick=\"$functionname(1);\" href=\"javascript:void(0)\">1</a></li>";
                    #$pagination.= "<li><a onclick=\"ajaxSearchFindContractor($revcnt,2);\" href=\"javascript:void(0)\">2</a></li>";
                    $pagination.= "<li><a>...</a></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li class=\"active\"><span >$counter</span></li>";
                        else
                            $pagination.= "<li><a onclick=\"$functionname($counter);\" href=\"javascript:void(0)\">$counter</a></li>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1) {
                $pagination.= "<li><a onclick=\"$functionname($next);\" href=\"javascript:void(0)\">&gt;</a></li>";
                $pagination.= "<li><a onclick=\"$functionname($lastpage);\" href=\"javascript:void(0)\">&raquo;</a></li>";
            }
            else{
                #$pagination.= "<span class=\"disabled\" title=\"Next\">&gt;</span>";
                #$pagination.= "<span class=\"disabled\" title=\"Last\">&raquo;</span>";
            }

            $pagination.= "</ul>\n";
        }
        return $pagination;
    }



    public function latlang($address)
    {
        $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');

        $geo = json_decode($geo, true);

        if($geo['status'] = 'OK')
        {
            $latitude = (empty($geo['results'][0]['geometry']['location']['lat'])) ? '0.00' : $geo['results'][0]['geometry']['location']['lat'];
            $longitude = (empty($geo['results'][0]['geometry']['location']['lng'])) ? '0.00' : $geo['results'][0]['geometry']['location']['lng'];
            $latlang[0]  = $latitude;
            $latlang[1]  = $longitude;
            return $latlang;
        }
    }
    public function distanceCal($value, $unit){
        // one miles equal to 1609.344 meters
        // one Km equal to 1000.000 meters
        if($unit == 'M')
            return $value * 1609.344;
        else if($unit == 'Km')
            return $value * 1000.000;
    }

    // MainCategory List
    public function getMaincategory()
    {
        $MainCategories = TableRegistry::get('MainCategories');
        $query          = $MainCategories->find('all')
            ->where((['id IS NOT NULL']));
        $mainCatList    = $query->toArray();

        return $mainCatList;
    }

    function getDistance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,$unit){

        //Calculate distance from latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return number_format(($miles * 1.609344),2);
        } else if ($unit == "N") {
            return ($miles * 0.8684).' nm';
        } else {
            return $miles.' mi';
        }
    }
//-----------------------------------------------------------------------------------------------------------------
}//class end...
?>