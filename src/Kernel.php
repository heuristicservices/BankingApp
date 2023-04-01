<?php

namespace App;

use App\Service\BankService;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel implements CompilerPassInterface
{
    use MicroKernelTrait;

    public function process(ContainerBuilder $containerBuilder)
    {
        $bankServiceDefinition = $containerBuilder->findDefinition(BankService::class);

        foreach ($containerBuilder->findTaggedServiceIds('banking_app.bank') as $id => $tags) {
            $bankServiceDefinition->addMethodCall('addBank', [new Reference($id)]);
        }
    }
}
