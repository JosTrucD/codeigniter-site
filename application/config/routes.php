<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller']     			 = "maylocnuoc/home";
$route['admin']                  			 = "admin/home";
$route['trang-chu']              			 = "maylocnuoc/home";
$route['([a-z0-9-]+)']           			 = "maylocnuoc/home/detail";
$route['may-loc-nuoc/([a-z0-9-]+)']          = "maylocnuoc/home/listCatePro";

$route['tin-tuc']                            = "maylocnuoc/article";
$route['gioi-thieu']                         = "maylocnuoc/article/intro";
$route['lien-he']                            = "maylocnuoc/article/contract";
$route['huong-dan-mua-hang']                 = "maylocnuoc/article/help";

$route['phan-loai']                          = "admin/category";
$route['them-moi-phan-loai']                 = "admin/category/insert";
$route['cap-nhat-phan-loai/([a-z0-9-]+)']    = "admin/category/edit";
$route['xoa-bo-phan-loai']                   = "admin/category/delete";

$route['nguoi-dung']                         = "admin/user";
$route['nguoi-dung/trang/([a-z0-9]+)']       = "admin/user";
$route['them-moi-nguoi-dung']                = "admin/user/insert";
$route['cap-nhat-nguoi-dung/([a-z0-9]+)']    = "admin/user/edit";
$route['xoa-bo-nguoi-dung']                  = "admin/user/delete";

$route['slider']                             = "admin/slider";
$route['slider/trang/([a-z0-9]+)']           = "admin/slider";
$route['them-moi-slider']                    = "admin/slider/insert";
$route['cap-nhat-slider/([a-z0-9]+)']        = "admin/slider/edit";
$route['xoa-bo-slider']                      = "admin/slider/delete";

$route['san-pham']                           = "admin/product";
$route['san-pham/trang/([a-z0-9]+)']         = "admin/product";
$route['them-moi-san-pham']                  = "admin/product/insert";
$route['cap-nhat-san-pham/([a-z0-9]+)']      = "admin/product/edit";
$route['xoa-bo-san-pham']                    = "admin/product/delete";


$route['bai-viet']                           = "admin/news";
$route['bai-viet/trang/([a-z0-9]+)']         = "admin/news";
$route['them-moi-bai-viet']                  = "admin/news/insert";
$route['cap-nhat-bai-viet/([a-z0-9]+)']      = "admin/news/edit";
$route['xoa-bo-bai-viet']                    = "admin/news/delete";

$route['dang-nhap']              = "admin/login";
$route['dang-xuat']              = "admin/login/logout";

$route['404_override']           = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */