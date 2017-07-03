<?php
namespace Trenza\Message\Block;
 
class Message extends \Magento\Framework\View\Element\Template
{
    public function getMessage()
    {
        return 'Test Message';
    }

    public function saveMessage($pid,$seller_id,$buyer_id,$parent_id,$message,$seller_read_flg,$buyer_read_flg,$seller_delete_flg,$buyer_delete_flg,$sender_id,$reciver_id,$created_at,$updated_at){

		$this->_resources = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');
		$connection= $this->_resources->getConnection();
		$themeTable = $this->_resources->getTableName('Trenza_message');
		$sql = "INSERT INTO " . $themeTable . "(product_id, seller_id,buyer_id,parent_id,message,seller_read_flg,buyer_read_flg,seller_delete_flg,buyer_delete_flg,sender_id,reciver_id,created_at,updated_at) VALUES ('$pid','$seller_id','$buyer_id','$parent_id','$message','$seller_read_flg','$buyer_read_flg','$seller_delete_flg','$buyer_delete_flg','$sender_id','$reciver_id','$created_at','$updated_at')";
		$connection->query($sql);
	}

	public function custom_connection(){
		$this->_resources = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');
		$connection= $this->_resources->getConnection();
		return $connection;
	}


}