<?php
namespace Services;
class DataHandler {
    // getPdo()
    protected function getPdo() {
        $dbConnect = 'mysql:dbname=jancation; host=127.0.0.1; charset=utf8';
        $username = 'root';
        $password = '';
        $driverOptions = [];
        $pdo = new \PDO($dbConnect, $username, $password, $driverOptions);
        return $pdo;
    }

    // getAll($TableName)
    public function getAll($TableName) {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM ' . $TableName . ' ORDER BY updated_at DESC';
        $query = $pdo->prepare($prepareText);
        $query->execute();
        return $query->fetchAll();
    }

    // getUsersOrderByWinRate()
    public function getUsersOrderByWinRate() {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM users ORDER BY win_rate DESC';
        $query = $pdo->prepare($prepareText);
        $query->execute();
        return $query->fetchAll();
    }

    // getById($Id, $TableName)
    public function getById($Id, $TableName) {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM ' . $TableName . ' WHERE id = :id';
        $query = $pdo->prepare($prepareText);
        $query->execute(['id' => $Id]);
        return $query->fetch();
    }

    // getUserByEmail($Email)
    public function getUserByEmail($Email) {
        $pdo = $this->getPdo();
        $queryUser = $pdo->prepare('SELECT * FROM users where email = :email');
        $queryUser->execute(['email' => $Email]);
        return $queryUser->fetch();
    }

    // insert($data, $TableName)
    public function insert($data, $TableName) {
        $pdo = $this->getPdo();
        $res = $this->getKeysAndValsStrings($data);
        $prepareText = 'INSERT INTO ' . $TableName . ' (' . $res['key'] . ') VALUES (' . $res['val'] . ')';
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // update($data, $identifier, $TableName)
    public function update($data, $identifier, $TableName) {
        $pdo = $this->getPdo();
        $paramsStr = $this->getUpdateParameterStrings($data);
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'UPDATE ' . $TableName . ' SET ' . $paramsStr . ' WHERE ' . $identifierStr;
        var_dump($prepareText);
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // updateScore($result, $identifier)
    public function updateScore($result, $identifier) {
        $pdo = $this->getPdo();
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $WLCount = $result . '_count';
        $func1 = $WLCount . ' = ' . $WLCount . ' + 1';
        $prepareText1 = 'UPDATE users SET ' . $func1 . ' WHERE ' . $identifierStr;
        var_dump($prepareText1);
        $query = $pdo->prepare($prepareText1);
        $query->execute();
        $func3 = 'win_rate = win_count * 100 / (win_count + lose_count)';
        $prepareText2 = 'UPDATE users SET ' . $func3 . ' WHERE ' . $identifierStr;
        var_dump($prepareText2);
        $query = $pdo->prepare($prepareText2);
        $query->execute();
    }

    // delete($identifier, $TableName)
    public function delete($identifier, $TableName) {
        $pdo = $this->getPdo();
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'DELETE FROM ' . $TableName . ' WHERE ' . $identifierStr;
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // getKeyAndValsStrings($data)
    protected function getKeysAndValsStrings($data) {
        $Keys = [];
        $Vals = [];
        foreach ($data as $aKey => $aVal) {
            $Keys[] = $aKey;
            $Vals[] = $aVal;
        }
        $KeysString = implode(',', $Keys);
        $ValsString = '';
        foreach ($Vals as $k => $aVal) {
            if (!is_numeric($aVal)) {
                $aVal = "'" . $aVal . "'";
            }
            if ($k > 0) {
                $ValsString .= ', ';
            }
            $ValsString .= $aVal;
        }
        return [
            'val' => $ValsString,
            'key' => $KeysString,
        ];
    }

    // getUpdateParameterStrings($data, $isIdentify = false)
    protected function getUpdateParameterStrings($data, $isIdentify = false) {
        $Keys = [];
        $Vals = [];
        foreach ($data as $aKey => $aVal) {
            $Keys[] = $aKey;
            $Vals[] = $aVal;
        }
        $updateString = '';
        foreach ($Vals as $k => $aVal) {
            if (!is_numeric($aVal)) {
                $aVal = "'" . $aVal . "'";
            }
            if ($k > 0) {
                $updateString .= ', ';
                if ($isIdentify) {
                    $updateString .= ' and ';
                }
            }
            $updateString .= sprintf('%s=%s', $Keys[$k], $aVal);
        }
        return $updateString;
    }
}
?>