<?php

use Phinx\Migration\AbstractMigration;

class UsersTable extends AbstractMigration
{
    public function up()
    {
        $user_details = $this->table('user');
        $user_details->addColumn('username', 'string')
            ->addColumn('location','string')    
            ->addColumn('age','string')->create();

        $user_details->insert([
            ["username" => "shivangi","location" =>"noida","age"=>1],
            ["username" => "prabhat","location" =>"mental hospital","age"=>0.5]
        ]);
        $user_details->saveData();

        $question = $this->table('question');
        $question->addColumn('question_text','text')
            ->addColumn('title','string')
            ->addColumn('like','integer')
            ->addColumn('answer','text')
            ->addColumn('user_id','integer')
            ->addForeignKey('user_id', 'user', 'id')
            ->create();

        $question->insert([
            ["title"=>"who m i ?","question_text"=>"alwayz i wonder and think who m i ponder?","user_id"=>"1"],
            ["title"=>"what is this ?","question_text"=>"is this another trial question?","user_id"=>"2"]
            ]);
        $question->saveData();

    }

    public function down() {
        $this->dropTable('user');
        $this->dropTable('question');
    }
}