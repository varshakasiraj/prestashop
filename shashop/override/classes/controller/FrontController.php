<?php
class FrontController extends FrontControllerCore{
    public function setMedia(){
        $this->registerStylesheet('theme-custom', '/assets/css/custome.css', ['media' => 'all', 'priority' => 1000]);
        return parent :: setMedia();
    }
    public function initContent()
    {  
       $sample ="hi";
        $this->context->smarty->assign([
            'sample' =>$sample,
        ]);
        return parent :: initContent();
    }
}
?>