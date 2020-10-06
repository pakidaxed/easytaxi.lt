<?php

namespace Core;

class FileDB
{

    private string $file_name;
    private array $data;

    private array $messages;

    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
    }

    public function setData(array $data_array)
    {
        $this->data = $data_array;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Saves JSON encoded data info DB file
     *
     * @return bool
     */
    public function save(): bool
    {
        $string = json_encode($this->data);
        $this->messages[] = 'Saved to DB';
        return file_put_contents($this->file_name, $string) !== false;
    }

    /*
     * Loading data from DB file
     */
    public function load()
    {
        if (file_exists($this->file_name)) {
            $data = json_decode(file_get_contents($this->file_name), true);
        } else {
            $data = null;
        }
        $this->data = is_array($data) ? $data : [];
    }

    /**
     * Creates empty array in data
     *
     * @param string $table_name
     * @return bool
     */
    public function createTable(string $table_name): bool
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            $this->messages[] = 'Table ' . $table_name . ' successfully created.';
            return true;
        }
        $this->messages[] = 'Table ' . $table_name . ' exists.';
        return false;
    }

    /**
     * Checks for existing tables in db
     *
     * @param string $table_name
     * @return bool
     */
    public function tableExists(string $table_name): bool
    {
        return isset($this->data[$table_name]);
    }

    /**
     * Drops a table from db
     *
     * @param string $table_name
     * @return bool
     */
    public function tableDrop(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            $this->messages[] = 'Table ' . $table_name . ' deleted.';
            return true;
        }
        return false;
    }

    /**
     * Clears a table in db
     *
     * @param string $table_name
     * @return bool
     */
    public function tableTruncate(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            $this->messages[] = 'Table ' . $table_name . ' truncated.';
            return true;
        }
        return false;
    }

    /**
     * Inserts a row into selected table
     *
     * @param string $table_name
     * @param array $row
     * @param null $row_id
     * @return false|mixed|null
     */
    public function insertRow(string $table_name, array $row, $row_id = null)
    {
        if ($row_id === null) {
            $row_id = array_filter(array_keys($this->data[$table_name]), 'is_int') ?: [0];
            $row_id = max($row_id);
            $row_id++;
        } else if ($this->rowExists($table_name, $row_id)) {
            $this->messages[] = 'Row ' . $row_id . ' exists.';

            return false;
        }

        $this->data[$table_name][$row_id] = $row;
        $this->messages[] = 'Row ' . $row_id . ' ready to save.';

        return $row_id;
    }

    /**
     * Updating row in a table
     *
     * @param string $table_name
     * @param array $row
     * @param string $row_id
     * @return bool
     */
    public function updateRow(string $table_name, array $row, string $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            $this->messages[] = 'Row ' . $row_id . ' updated.';

            return true;
        }
        return false;
    }

    /**
     * Deletes row from table
     *
     * @param string $table_name
     * @param string $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, string $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            $this->messages[] = 'Row ' . $row_id . ' deleted.';
            return true;
        }
        return false;
    }

    /**
     * Getting data from table by ID
     *
     * @param string $table_name
     * @param string $row_id
     * @return false|mixed
     */
    public function getRowById(string $table_name, string $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            return $this->data[$table_name][$row_id];
        }
        return false;
    }

    /**
     * Searches table for rows by given condition
     *
     * @param string $table_name
     * @param array $conditions
     * @return array
     */
    public function getRowsWhere(string $table_name, array $conditions): array
    {
        $results = [];
        if ($this->tableExists($table_name)) {
            foreach ($this->data[$table_name] as $row_id => $row) {
                $match = true;
                foreach ($conditions as $condition_key => $condition) {
                    if ($row[$condition_key] !== $condition) {
                        $match = false;
                        break;
                    }
                }
                if ($match) $results[$row_id] = $row;
            }
        }
        return $results ?? [];
    }




    /**
     * Checks for existing rows in table
     *
     * @param string $table_name
     * @param string $row_id
     * @return bool
     */
    public function rowExists(string $table_name, string $row_id): bool
    {
        return isset($this->data[$table_name][$row_id]);
    }


    public function showMessage()
    {
        foreach ($this->messages ?? [] as $message) {
            print $message;
            print '<br />';
        }
    }

}

