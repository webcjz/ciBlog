<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/15
 * Time: 17:10
 */

function refresh()
{
    echo "<script language=JavaScript> location.replace(location.href);</script>";
}

function headto($url)
{
    echo "<script>window.location.href='$url';</script>";

}
