<?php
 if($this->session->userdata('level')!=1){
    if($this->session->userdata('level')==2){
        redirect('ad/app1');
    }
    if($this->session->userdata('level')==3){
        redirect('ad/app2');
    }
    if($this->session->userdata('level')==0){
        redirect('ad/app3');
    }
 }
?>