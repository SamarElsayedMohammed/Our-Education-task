<?php
namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Str;

class TransactionService
{

    public function createTransaction($data): Transaction
    {
        $trans = new Transaction;

        if (isset($data['parentIdentification'])) {
            $trans->parent_identification = $data['parentIdentification'];
        } else {
            $trans->parent_identification = Str::uuid();
        }
        $trans->paid_amount = $data['paidAmount'];
        $trans->currency = $data['Currency'];
        $trans->parent_email = $data['parentEmail'];
        $trans->status_code = $data['statusCode'];
        $trans->payment_date = $data['paymentDate'];
        $trans->save();
        return $trans;
    }

    public function UpdateTransaction($transactionData, Transaction $trans)
    {
        $trans->paid_amount = $transactionData['paidAmount'];
        $trans->currency = $transactionData['Currency'];
        $trans->parent_email = $transactionData['parentEmail'];
        $trans->status_code = $transactionData['statusCode'];
        $trans->payment_date = $transactionData['paymentDate'];
        $trans->save();
        return $trans;

    }
}