<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobTitle = ['Bank Credit Clerk','Bank Foreign-Exchange Dealer','Bank Teller','Bond Sales Manager','Bond Sales Officer','Bond Trading Manger','Branch Manager – Insurance','Branch Manager Trainee','Branch Manager','Branch Review Specialist','Branch Review Team Lead','Branch Service Representative I','Branch Service Representative Iii','Branch Service Representative Ii','Branch Service Specialist','Budget Analyst Ii','Budget Analyst I', 'Budget Analyst Iii','Budgeting Supervisor I','Budget Analyst Iv','Budgeting Supervisor Ii','Business Banking Development Officer I','Business Banking Manger I, Ii','Business Banking Manger Ii','Business Development Officer','Business Development Officer (Select Customer) Senior','Business Systems Executive','Business Systems Manager','Business Systems Officer','Cash Management Manger','Cash Management Officer I','Cash Management Service Manager','Cash Management Service Representative I','Cash Management Service Representative Ii','Cash Management Service Representative Iii','Cash Management Service Supervisor','Check Collections Manager','Check Processing Manager','Check Processor','Checking / Debit Card Business Manager','Chief Lending Officer Client Services Representative','Collateral Appraiser I, Ii','Collateral Appraiser Ii','Collateral Manager','Collections Representative I','Collections Representative Ii','Collections Representative Iii','Commercial Credit Analyst I','Commercial Credit Analyst Ii','Commercial Credit Analyst Iii','Commercial Loan Officer','Float Manager','Floor Banker','Head Bank Teller','Loan Officer','Mortgage Originator','Mortgage Payment Processing Clerk','Mortgage Processor','Mortgage Underwriter','Operations','Personal Loan Officer','Budgeting Supervisor Iii','Other'];
        foreach ($jobTitle as $key => $value) {
            Dictionary::create([
                'entity' => 'BANK',
                'key' => 'JOB_TITLE',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $FI_represent = ['Acquirers','Asset Management Company','Bond Brokerage Firm','Check Cashing Company','Commercial banks','Community Bank','Community Development Financial Institution','Credit Union','Discount Brokerage Bonds','Discount Brokerage Stocks','Face Amount Certificate Company','Full Brokerage Bonds','Full Brokerage Stocks','Hedge Funds','Insurance Company','Internet Bank','Investment Bank','Management Investment Company','Mortgage Banks','Mutual Bank','Payday Lender','Savings & Loan','Shadow Bank','Stock Brokerage Firm','Title Company','Unit Investment Trusts (UIT)'];
        foreach ($FI_represent as $key => $value) {
            Dictionary::create([
                'entity' => 'BANK',
                'key' => 'FI_REPRESENT',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $FI_charter_type = ['Federal','State'];
        foreach ($FI_charter_type as $key => $value) {
            Dictionary::create([
                'entity' => 'BANK',
                'key' => 'FI_TYPE',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $assetSize = ['Large(upto $1.16 Billion)','Intermediate($ 290 Million - $1.16 Billion)','Small(less or equal $290 Million)'];
        foreach ($assetSize as $key => $value) {
            Dictionary::create([
                'entity' => 'BANK',
                'key' => 'ASSET_SIZE',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $FI_performs = ['Alternative Investments','Auto loans','Bonds','Business Banking Accounts','Business Banking Loans','Car Insurance','Casualty Insurance','Checking account','Commercial Appraisals','Commercial Paper','Commercial Real Estate Loans','Corporate Reorganizations','Credit cards','Death Insurance','Debit cards','Demand deposits','Disability Insurance','Equity Offerings','Exchange Traded Funds (ETFs)','Fire Insurance','Health Insurance','Initial Public Offerings (IPOs)','Institutional Client Broker','Insurance products','Investment Banking','Mergers and Acquisitions Facilitator','Mortgage loans','Mutual Funds Closed-ended','Mutual Funds Open-ended','Personal loans','Property Insurance','Public / Private Share Offerings','Residential Appraisals','Residential Real Estate Loans','Savings accounts','Stocks','SWIFT','Tax Deferred Annuity','Trading','Underwriting Debit','Wealth advisor','Wire Transfers'];
        foreach ($FI_performs as $key => $value) {
            Dictionary::create([
                'entity' => 'BANK',
                'key' => 'FI_PERFORMS',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $dailyTrades = ['Less or equal 10000','10001 to 30000','30001 to 50000','Greater or equal 50001'];
        foreach ($dailyTrades as $key => $value) {
            Dictionary::create([
                'entity' => 'BANK',
                'key' => 'DAILY_TRADE',
                'value' => $value,
                'sort' => $key
            ]);
        }
    }
}
