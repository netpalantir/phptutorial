<?php

var_dump(0 == false);     // bool(true)
var_dump(0 == 'test');    // bool(true)
var_dump(0 == '1test');    // bool(false)
var_dump(1 == '1test');    // bool(true)
var_dump('test' == true); // bool(true)
var_dump('0test' == true); // bool(true)
var_dump('test' == false); // bool(false)





