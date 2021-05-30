<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use \App\Models\Company;

class CompanyTest extends TestCase
{
    /** @test */
    public function check_if_company_columns_is_correct()
    {
        $company = new Company();
        $expected = [
            'name', 
            'active', 
            'zipcode', 
            'address'
        ];
        $arrayCompared = array_diff($expected, $company->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }
}
