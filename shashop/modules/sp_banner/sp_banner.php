<?php
class Sp_Banner extends Module{
    public function __construct()
    {
        $this->name = 'sp_banner';
        $this->version = '2.1.2';
        $this->author = 'PrestaShop';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();
        $this->registerHook('displayHeader');
        $this->displayName = $this->trans('sp_Banner');
        $this->description = $this->trans('new arrival banner');

        $this->ps_versions_compliancy = ['min' => '1.7.1.0', 'max' => _PS_VERSION_];
    }
    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayHome') &&
            $this->registerHook('displayHeader');
    }
    public function uninstall(){
        return parent::uninstall();
    }
    public function hookDisplayHeader(){
        $this->context->controller->registerStylesheet('sp_banner_css', '/modules/sp_banner/css/sp_banner.css', ['media' => 'all', 'priority' => 1000]);
        $this->context->controller->registerStylesheet('slick_css', '/modules/sp_banner/css/slick.css', ['media' => 'all', 'priority' => 1000]);
        $this->context->controller->registerJavascript('slick_js', '/modules/sp_banner/js/slick.min.js', ['position' => 'bottom', 'priority' => 1000]);
        $this->context->controller->registerJavascript('sp_banner_js', '/modules/sp_banner/js/custome.js', ['position' => 'bottom', 'priority' => 1000]);
    }
    public function hookDisplayHome(){
        return  $this->display(__FILE__, 'sp_banner.tpl');
    }
} 
?>
