<?php
 if($this->session->userdata('level')!=2){
    if($this->session->userdata('level')==1){
        redirect('ad');
    }
    if($this->session->userdata('level')==3){
        redirect('ad/app2');
    }
    if($this->session->userdata('level')==0){
        redirect('ad/app3');
    }
 }
?>