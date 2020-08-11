<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */

 function my_custon_errors()
 {
     if(\Config\Services::session()->getFlashdata('sucesso')){
        echo '<div class="alert alert-success" role="alert">';
        echo \Config\Services::session()->getFlashdata('sucesso');
        echo '</div>';
     }

     if(\Config\Services::session()->getFlashdata('erro')){
        echo '<div class="alert alert-danger" role="alert">';
        echo \Config\Services::session()->getFlashdata('erro');
        echo '</div>';
     }

     echo \Config\Services::validation()->listErrors();
 }

 function label_status($status){
    $label = '';

    switch ($status) {
      
      case 'Pendente':
         $label = '<span class="badge badge-warning w-100">Pendente</span>';
         break;
       
      case 'Aguardando':
         $label = '<span class="badge badge-info w-100">Aguardando</span>';
         break;

      case 'Resolvido':
         $label = '<span class="badge badge-success w-100">Resolvido</span>';
         break; 

      case 'Cancelado':
         $label = '<span class="badge badge-danger w-100">Cancelado</span>';
         break;
    }
    return $label;
 }