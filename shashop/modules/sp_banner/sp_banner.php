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
        $this->context->smarty->assign(
            [
                'slider' => $this->selectSlider(),
            ]
    );
        return  $this->display(__FILE__, 'sp_banner.tpl');
    }
    public function getContent(){
        $output = '';
        if(Tools::isSubmit('input_slider'.$this->name))
        {
             $module_name = (string) Tools::getValue("block_name");
             Configuration::updateValue("block_name",$module_name);
             $output = $this->displayConfirmation($this->l('Settings updated'));
        }
        elseif(Tools::isSubmit('insert_slider'.$this->name))
        {
            $image = (string) Tools::getValue("image_name");
            $image_name = $this->imageValidation($image);
            $slider_name= (string) Tools::getValue("slider_name");
            $path = (string) Tools::getValue("link");
            $positions = (int) Tools::getValue("position");
            $status = (int) Tools::getValue("status");
            $output = $this->displayConfirmation($this->l('Sucessfully Filled the Fileds'));
            $data =[
                'image_name'=>$image_name,
                'slider_name'=>$slider_name,
                'path'=>$path,
                'status'=>$status,
                'positions'=>$positions,
            ];
           return $this->insertSlider($data);
        }
        return $output.$this->displayForm().$this->displayInsertForm();
    }
    public function insertSlider($data){
        $db = \Db::getInstance();
        $insert = $db->insert('sp_banner',$data,Db::INSERT);
        return $insert;
    }
    public function selectSlider(){
        $db = \Db::getInstance();
        $request = 'SELECT * FROM ps_sp_banner';
        $result = $db->executeS($request);
        return $result;
    }
    public function getErrors(){
        $errors = [
            "image"=>"Wheather image is empty or having wrong extension",
        ];
    }
    public function imageValidation($image){
        $allowed_img_extension = ["jpg", "jpeg", "bmp", "gif", "png","jfif"];
        $basename =  basename($image);
        $extension = substr(strrchr($basename, '.'), 1);
        if (!empty($image)&& in_array($extension, $allowed_img_extension)) {
            $path = $_FILES['image_name']['tmp_name'];
            $image_path = dirname(__DIR__)."\sp_banner\image\\".$basename;
            if(move_uploaded_file($path, $image_path)){
                return $basename;
            }
        } 
        else {
            echo "Wheather image is empty or having wrong extension";
        }
    }
    public function displayForm(){
        $form=[
            'form' =>[
                'input' => [
                    array(
                        'type' => 'text',
                        'name' => 'block_name',
                        'required' => true,
                        'label' =>'Enter your Block Name'
                    ),
                ],
                'submit' =>[
                    'title' => 'submit',
                    'name' =>'input_slider',
                ]
            ]
           
        ];
        $helperform = new HelperForm();
        $helperform->table = $this->table;
        $helperform->submit_action = 'input_slider' . $this->name;
        $helperform->fields_value['block_name'] = Configuration::get("block_name");
        return $helperform->generateForm([$form]);
    }
    public function data(){
        $data =[];
    }
    public function displayInsertForm(){
        $form=[
            'form' =>[
                'input' =>array(
                    array(
                        'type' =>"file",
                        'name' => 'image_name',
                        'required' => true,
                        'label' =>'Slider Name'
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'slider_name',
                        'required' => true,
                        'label' =>'Slider Name'
                    ),
                    array(
                        'type'=>'text',
                        'name' => 'link',
                        'required' => true,
                        'label' =>'Link'
                    ),
                    array(
                        'type'=>'text',
                        'name' => 'position',
                        'required' => true,
                        'label' =>'Position'
                    ),
                    array(
                        'type'=>'radio',
                        'name' => 'status',
                        'required' => true,
                        'label' =>'Status',
                        'isbool' =>true,
                        'values' => array(
                            array(
                                'id' =>'enable',
                                'value' =>1,
                                'label' =>'Enabled',
                              ),
                            array(
                              'id' =>'disable',
                              'value' =>0,
                              'label' =>'Disabled',
                              
                            ),
                        )
                    ),

                ),
                'submit' =>[
                    'title' => 'Insert',
                    'name' => 'insert_slider'
                ]
            ]
           
        ];
        $helperform = new HelperForm();
        $helperform->table = $this->table;

        $helperform->submit_action = 'insert_slider' . $this->name;

        $helperform->fields_value['image_name'] = Tools::getValue("image_name");
        $helperform->fields_value['slider_name'] = Tools::getValue("slider_name");
        $helperform->fields_value['link'] = Tools::getValue("link");
        $helperform->fields_value['position'] = Tools::getValue("position");
        $helperform->fields_value['status'] = Tools::getValue("status");
        return $helperform->generateForm([$form]);
    }
    
} 
?>
