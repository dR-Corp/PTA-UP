<?php
/**
 * 
 * class User
 */
class User extends Model {

    protected $fillable = ['username', 'password', 'structure_ID', 'role'];

    const ROLE_USER = 1;
    const ROLE_SUPERUSER = 2;

    // the password must be hash

    public static function create(array $attributes = [])
    {
        if(isset($attributes['password'])) 
            $attributes['password'] = sha1($attributes['password']);
        parent::create($attributes = []);
    }

    public function update(array $attributes = [])
    {
        if(isset($attributes['password'])) 
            $attributes['password'] = sha1($attributes['password']);

        parent::update($attributes = []);
        
    }

    // on verra les possibilité de unset le password, lorsque non utilise dans un récupération


    // comportement
    
    // login

    // logout

    // register


    
}