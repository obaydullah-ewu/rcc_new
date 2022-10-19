<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Rakibhstu\Banglanumber\NumberToBangla;

const LAND_NATURE_FILLED = 'filled';
const LAND_NATURE_POND = 'pond';

//Start
const LAND_LEASE_APPLICATION_STATUS_PENDING = 'pending';
const LAND_LEASE_APPLICATION_STATUS_APPROVED = 'approved';
const LAND_LEASE_APPLICATION_STATUS_CANCELLED = 'cancelled';

const LAND_LEASE_RENEWAL_STATUS_PENDING = 'pending';
const LAND_LEASE_RENEWAL_STATUS_APPROVED = 'approved';
const LAND_LEASE_RENEWAL_STATUS_CANCELLED = 'cancelled';
//End

function saveImage($destination, $attribute, $width = null, $height = null): string
{
    if (!File::isDirectory(base_path() . '/public/uploads/' . $destination)) {
        File::makeDirectory(base_path() . '/public/uploads/' . $destination, 0777, true, true);
    }

    if ($attribute->extension() == 'svg') {
        $file_name = time() . '-' . $attribute->getClientOriginalName();
        $path = 'uploads/' . $destination . '/' . $file_name;
        $attribute->move(public_path('uploads/' . $destination . '/'), $file_name);
        return $path;
    }

    $img = Image::make($attribute);
    if ($width != null && $height != null && is_int($width) && is_int($height)) {
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    $returnPath = 'uploads/' . $destination . '/' . time() . '-' . Str::random(10) . '.' . $attribute->extension();
    $savePath = base_path() . '/public/' . $returnPath;
    $img->save($savePath);
    return $returnPath;
}

function deleteFile($path)
{
    File::delete($path);
}

function getFile($file)
{
    return asset($file);
}


function numberParser($value)
{
    return (float)str_replace(',', '', number_format(($value), 2));
}

function bn2en($number)
{
    $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
    $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
//    return str_replace(self::$bn, self::$en, $number);
}

function en2bnNumber($number)
{
    if (!$number) {
        return 0 . ' টাকা';
    }
    $arrFrom = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $arrTo = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    return str_replace($arrFrom, $arrTo, $number) . ' টাকা';
}

function en2bn($number)
{
    $arrFrom = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $arrTo = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    return str_replace($arrFrom, $arrTo, $number);
}

function getDateFormat($value)
{
    return \Carbon\Carbon::parse($value)->format('d M Y');
}

function getDateYear($value)
{
    return \Carbon\Carbon::parse($value)->format('Y');
}

function getDateMonth($value)
{
    return \Carbon\Carbon::parse($value)->format('m');
}

function getBanglaDateFormat($value)
{
    $date = \Carbon\Carbon::parse($value)->format('d M Y');
    $numberFrom = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $numberTo = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $date  = str_replace($numberFrom, $numberTo, $date);

    $en_months_from = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $bn_months_to = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

    $date  = str_replace($en_months_from, $bn_months_to, $date);
    return $date;
}

function numberBnWord($value)
{
    $num = new NumberToBangla();
    $text = $num->bnWord($value);
    return $text;
}
