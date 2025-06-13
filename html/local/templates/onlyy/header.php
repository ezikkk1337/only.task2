<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<?$APPLICATION->ShowHead();?>
<link href="<?=SITE_TEMPLATE_PATH?>/common.css" type="text/css" rel="stylesheet" />
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
	<div id="barba-wrapper">
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>

			<h1 id="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>