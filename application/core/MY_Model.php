<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Model.php
 * 
 * Base model for a database table.
 */
class MY_Model extends CI_Model
{
    protected $table_name;
    protected $primary_key;

    /**
     * Constructor.
     * @param string @table_name   The name of the database table.
     * @param string $primary_key  The name of the primary key field.
     */
    public function __construct($table_name = null, $primary_key = 'id')
    {
        parent::__construct();
        $this->table_name  = $table_name;
        $this->primary_key = $primary_key;
    }

    /**
     * Creates an empty record.
     * @return \StdClass An empty record.
     */
    public function create()
    {
        $record = new StdClass;
        
        foreach ($this->fields() as $field)
        {
            $record->$field = '';
        }
        
        return $record;
    }
    
    /**
     * Retrives a record from the table.
     * @param $key  The primary key value of the record.
     * @return  The record with the given key.
     */
    public function get($key)
    {
        $query = $this->db->where($this->primary_key, $key)
                          ->get($this->table_name);
        
        if ($query->num_rows() == 0)
        {
            return null;
        }
        
        return $query->row();
    }

    /**
     * Adds a new record to the table.
     * @param $record  The record to be added.
     */
    public function add($record)
    {
        if (is_object($record))
        {
            $record = get_object_vars($record);
        }
        
        $this->db->insert($this->table_name, $record);
    }
    
    /**
     * Updates a record in the table.
     * @param $record  The record to be updated.
     */
    public function update($record)
    {
        if (is_object($record))
        {
            $record = get_object_vars($record);
        }
        
        $this->db->where($this->primary_key, $record[$this->primary_key])
                 ->update($this->table_name, $record);
    }
    
    /**
     * Deletes a record from the table.
     * @param $key  The primary key of the record to be deleted.
     */
    public function delete($key)
    {
        $this->db->where($this->primary_key, $key)->delete($this->table_name);
    }

    /**
     * @param $key  A primary key value.
     * @return boolean  Whether a record with this key exists.
     */
    public function exists($key)
    {
        return $this->db->where($this->primary_key, $key)
                        ->get($this->table_name)->num_rows() > 0;
    }
    
    /**
     * @return All records as an array of objects.
     */
    public function all()
    {
        return $this->db->order_by($this->primary_key, 'asc')
                        ->get($this->table_name)->result();
    }

    /**
     * @return The highest primary key value used.
     */
    public function highest()
    {
        $key   = $this->primary_key;
        $query = $this->db->select_max($key)->get($this->table_name);
        
        if ($query->num_rows() == 0)
        {
            return null;
        }
        
        return $query->row()->$key;
    }
    
    /**
     * @return int  The number of records in this table.
     */
    public function size()
    {
        return $this->db->get($this->table_name)->num_rows();
    }

    /**
     * @return array(string)  The field names in this table.
     */
    public function fields()
    {
        return $this->db->list_fields($this->table_name);
    }
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */