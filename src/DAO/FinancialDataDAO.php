<?php


namespace App\DAO;

class FinancialDataDAO extends DAO
{
    public function newSimulation($post, $userId)
    {
        $sql = 'INSERT INTO simulation ( first_need, first_income, fixed_charges, variable_expenses, income, userId, createdAt, draft) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)';
        $this->createQuery($sql, [$_POST['first_need'], $_POST['first_income'], $_POST['fixed_charges'], $_POST['variable_expenses'], $_POST['income'], $userId, 0]);
    }
}