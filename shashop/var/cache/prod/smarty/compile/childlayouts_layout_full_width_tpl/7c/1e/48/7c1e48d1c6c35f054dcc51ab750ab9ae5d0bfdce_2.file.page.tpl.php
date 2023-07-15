<?php
/* Smarty version 3.1.48, created on 2023-07-15 17:34:56
  from 'D:\xampp\htdocs\prestashop\shashop\themes\classic\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_64b28b68b9a9d6_42280066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c1e48d1c6c35f054dcc51ab750ab9ae5d0bfdce' => 
    array (
      0 => 'D:\\xampp\\htdocs\\prestashop\\shashop\\themes\\classic\\templates\\page.tpl',
      1 => 1689402525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64b28b68b9a9d6_42280066 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_24686042164b28b68b49ee6_99314733', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_191584340564b28b68b4ab46_08082334 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_114446909864b28b68b4a4e4_75950130 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_191584340564b28b68b4ab46_08082334', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_125977055464b28b68b98fb1_77286921 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_51667561164b28b68b994d9_21339734 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_150824480864b28b68b98bd5_13348968 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_125977055464b28b68b98fb1_77286921', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_51667561164b28b68b994d9_21339734', 'page_content', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_8258082064b28b68b99fe1_95818222 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_137039125264b28b68b99ce0_75237682 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8258082064b28b68b99fe1_95818222', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_24686042164b28b68b49ee6_99314733 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_24686042164b28b68b49ee6_99314733',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_114446909864b28b68b4a4e4_75950130',
  ),
  'page_title' => 
  array (
    0 => 'Block_191584340564b28b68b4ab46_08082334',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_150824480864b28b68b98bd5_13348968',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_125977055464b28b68b98fb1_77286921',
  ),
  'page_content' => 
  array (
    0 => 'Block_51667561164b28b68b994d9_21339734',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_137039125264b28b68b99ce0_75237682',
  ),
  'page_footer' => 
  array (
    0 => 'Block_8258082064b28b68b99fe1_95818222',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_114446909864b28b68b4a4e4_75950130', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_150824480864b28b68b98bd5_13348968', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137039125264b28b68b99ce0_75237682', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
