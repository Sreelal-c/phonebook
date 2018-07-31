<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /*
        By default, the plural form of the model name is used as the table name and 
        the primary key field name is assumed to be id. 
        This section shows you how you can explicitly define both the table and 
        primary key field names Add the following lines to Contacts model
    */
    //explicitly defines primary key and table name
    protected $primaryKey = 'id';
    protected $table = 'contacts';
}
