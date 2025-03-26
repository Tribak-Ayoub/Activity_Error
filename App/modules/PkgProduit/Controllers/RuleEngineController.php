<?php

namespace Modules\PkgProduit\Controllers;

use App\Http\Controllers\Controller;
use Modules\PkgProduit\App\Services\RuleEngine;

class RuleEngineController extends Controller
{
    protected $ruleEngine;

    public function __construct(RuleEngine $ruleEngine)
    {
        $this->ruleEngine = $ruleEngine;
    }

    public function testRule()
    {
        $rule = 'stock < 5 && price > 100';
        $data = ['stock' => 10, 'price' => 200];

        $data = $this->ruleEngine->evaluate($rule, $data);

        if (isset($data['error'])) {
            return $data['error'];
        }

        return view('PkgProduit::test_rule', $data);
    }
}