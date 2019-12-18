<?php
$this->load->view($module . '/layout/header', ['title' => $title]);
$this->load->view($module . '/layout/sidebar');
$this->load->view($module . '/layout/navbar');
$this->load->view($module . '/' . $content);
$this->load->view($module . '/layout/footer');

