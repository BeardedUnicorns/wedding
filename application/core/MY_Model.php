<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

/**
 * Generic data access model, for an RDB.
 *
 * @author		JLP
 * @copyright           Copyright (c) 2010-2014, James L. Parry
 * ------------------------------------------------------------------------
 */
class MY_Model extends CI_Model {

    protected $_tableName;            // Which table is this a model for?
    protected $_keyField;             // name of the primary key field

//---------------------------------------------------------------------------
//  Housekeeping methods
//---------------------------------------------------------------------------

    /**
     * Constructor.
     * @param string $tablename Name of the RDB table
     * @param string $keyfield  Name of the primary key field
     */
    function __construct($tablename = null, $keyfield = 'id') {
        parent::__construct();

        if ($tablename == null)
        {
            $this->_tableName = get_class($this);
        }
        else
        {
            $this->_tableName = $tablename;
        }

        $this->_keyField = $keyfield;
    }

//---------------------------------------------------------------------------
//  Utility methods
//---------------------------------------------------------------------------

    /**
     * Return the number of records in this table.
     * @return int The number of records in this table
     */
    function size() {
        $query = $this->db->get($this->_tableName);
        return $query->num_rows();
    }

    /**
     * Return the field names in this table, from the table metadata.
     * @return array(string) The field names in this table
     */
    function fields() {
        return $this->db->list_fields($this->_tableName);
    }

//---------------------------------------------------------------------------
//  C R U D methods
//---------------------------------------------------------------------------
    // Create a new data object.
    // Only use this method if intending to create an empty record and then
    // populate it.
    function create() {
        $names = $this->db->list_fields($this->_tableName);
        $object = new StdClass;
        foreach ($names as $name)
        {
            $object->$name = "";
        }
        return $object;
    }

    // Add a record to the DB
    function add($record) {
        // convert object to associative array, if needed
        if (is_object($record)) {
            $data = get_object_vars($record);
        } else {
            $data = $record;
        }
        // update the DB table appropriately
        $this->db->insert($this->_tableName, $data);
    }

    // Retrieve an existing DB record as an object
    function get($key) {
        $this->db->where($this->_keyField, $key);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
        {
            return null;
        }
        return $query->row();
    }

    // Update a record in the DB
    function update($record) {
        // convert object to associative array, if needed
        if (is_object($record)) {
            $data = get_object_vars($record);
        } else {
            $data = $record;
        }
        // update the DB table appropriately
        $key = $data[$this->_keyField];
        $this->db->where($this->_keyField, $key);
        $this->db->update($this->_tableName, $data);
    }

    // Delete a record from the DB
    function delete($key) {
        $this->db->where($this->_keyField, $key);
        $this->db->delete($this->_tableName);
    }

    // Determine if a key exists
    function exists($key) {
        $this->db->where($this->_keyField, $key);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
        {
            return false;
        }
        return true;
    }

//---------------------------------------------------------------------------
//  Aggregate methods
//---------------------------------------------------------------------------
    // Return all records as an array of objects
    function all() {
        $this->db->order_by($this->_keyField, 'asc');
        return $this->db->get($this->_tableName)->result();
    }

    // Return all records as a result set
    function results() {
        $this->db->order_by($this->_keyField, 'asc');
        return $this->db->get($this->_tableName);
    }

    // Determine the highest key used
    function highest() {
	$key = $this->_keyField;
        $this->db->select_max($key);
        $query = $this->db->get($this->_tableName);
        $result = $query->result();
        if (count($result) > 0)
        {
            return $result[0]->$key;
        }
        else
        {
            return null;
        }
    }
}

/* End of file */
