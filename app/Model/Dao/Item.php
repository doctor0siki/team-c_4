<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

/**
 * Class Item
 *
 * Itemテーブルを扱う Classです
 * DAO.phpに用意したCRUD関数以外を実装するときに、記載をします。
 *
 * @copyright Ceres inc.
 * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
 * @since 2019/08/14
 * @package Model\Dao
 */
class Item extends Dao
{

    /**
     * getItemList Function
     *
     * Itemテーブルにあるアイテム一覧を取得するためのサンプルです。
     *
     * @return array $result 結果情報を連想配列で指定します。
     * @throws DBALException
     * @since 2019/08/14
     * @copyright Ceres inc.
     * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
     */
    public function getItemList()
    {

        //全件取得するクエリを作成
        $sql = "select * from item order by date desc";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }

    /**
     * getItem Function
     *
     * Itemテーブルから指定idのレコードを一件取得するクエリです。
     *
     * @param int $id 引数として、取得したい商品のアイテムIDを指定します。
     * @return array $result 結果情報を連想配列で指定します。
     * @throws DBALException
     * @copyright Ceres inc.
     * @author y-fukumoto <y-fukumoto@ceres-inc.jp>
     * @since 2019/08/14
     */

    public function getItem($title)
    {

        //全件取得するクエリを作成
        $sql = "select * from item where title =:title";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //idを指定します
        $statement->bindParam(":title", $title, PDO::PARAM_STR);

        //SQLを実行
        $statement->execute();

        //結果レコードを一件取得し、返送
        return $statement->fetch();

    }
    public function getItemUser($user_id)
    {

        //全件取得するクエリを作成
        $sql = "select * from item where user_id =:user_id order by date desc";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //idを指定します
        $statement->bindParam(":user_id", $user_id, PDO::PARAM_STR);

        //SQLを実行
        $statement->execute();

        //結果レコードを一件取得し、返送
        return $statement->fetchAll();

    }

}
