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
    public function getContent(){
        $output = '';
        if(!empty("input_slider") && Tools::isSubmit('submit'.$this->name))
        {
            $check = (string) Tools::getValue("input_slider");
            var_dump($check);
             $module_name = (string) Tools::getValue("slider_name");
             var_dump($module_name);
             Configuration::updateValue("slider_name",$module_name);
             $output = $this->displayConfirmation($this->l('Settings updated'));
        }
        return $output.$this->displayForm().$this->displayInsertForm();
    }
    public function displayForm(){
        $form=[
            'form' =>[
                'input' => [
                    array(
                        'type' => 'text',
                        'name' => 'slider_name',
                        'required' => true,
                        'label' =>'Module_Name'
                    ),
                    array(
                        'type' => 'hidden',
                        'name' => 'input_slider',
                        'required' => true,        
                    ),
                    
                    
                ],
                'submit' =>[
                    'title' => 'submit',
                ]
            ]
           
        ];
        $helperform = new HelperForm();
        $helperform->table = $this->table;
        $helperform->name_controller = $this->name;
        $helperform->submit_action = 'submit' . $this->name;
        $helperform->fields_value['slider_name'] = Configuration::get("slider_name");
        $helperform->fields_value['input_slider'] = 'test';
        return $helperform->generateForm([$form]);
    }
    public function displayInsertForm(){
        $form=[
            'form' =>[
                'input' =>array(
                    array(
                        'type' => 'text',
                        'name' => 'slider_name',
                        'required' => true,
                        'label' =>'Module_Name'
                    ),
                    array(
                        'type'=>'text',
                        'name' => 'title',
                        'required' => true,
                        'label' =>'title'
                    ),
                    array(
                        'type'=>'text',
                        'name' => 'position',
                        'required' => true,
                        'label' =>'position'
                    ),
                    array(
                        'type'=>'text',
                        'name' => 'status',
                        'required' => true,
                        'label' =>'status'
                    ),

                ),
                'submit' =>[
                    'title' => 'submit',
                ]
            ]
           
        ];
        $helperform = new HelperForm();
        $helperform->table = $this->table;
        $helperform->name_controller = $this->name;
        $helperform->submit_action = 'submit' . $this->name;
        return $helperform->generateForm([$form]);
    }
    
} 
?>
