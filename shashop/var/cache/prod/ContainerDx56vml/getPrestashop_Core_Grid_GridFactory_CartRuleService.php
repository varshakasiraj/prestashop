<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.core.grid.grid_factory.cart_rule' shared service.

return $this->services['prestashop.core.grid.grid_factory.cart_rule'] = new \PrestaShop\PrestaShop\Core\Grid\GridFactory(${($_ = isset($this->services['prestashop.core.grid.definition.factory.cart_rule']) ? $this->services['prestashop.core.grid.definition.factory.cart_rule'] : $this->load('getPrestashop_Core_Grid_Definition_Factory_CartRuleService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.grid.data.factory.cart_rule']) ? $this->services['prestashop.core.grid.data.factory.cart_rule'] : $this->load('getPrestashop_Core_Grid_Data_Factory_CartRuleService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.grid.filter.form_factory']) ? $this->services['prestashop.core.grid.filter.form_factory'] : $this->load('getPrestashop_Core_Grid_Filter_FormFactoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'});
