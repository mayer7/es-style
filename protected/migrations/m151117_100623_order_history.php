<?php

class m151117_100623_order_history extends CDbMigration
{
	public function up()
	{
        $this->createTable('order_history', array(
            'id' => 'pk',
            'user_id' => 'int',
            'status' => 'string',
            'is_paid' => 'boolean',
            'shipping_method' => 'string',
            'date_create' => 'datetime',
        ));
        $this->addColumn('cart_item', 'order_id', 'int');
        $this->addForeignKey('FK_order_history_user_id', 'order_history', 'user_id', 'user', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('FK_cart_item_order_id', 'cart_item', 'order_id', 'order_history', 'id', 'CASCADE', 'RESTRICT');

    }

	public function down()
	{
		echo "m151117_100623_order_history does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}