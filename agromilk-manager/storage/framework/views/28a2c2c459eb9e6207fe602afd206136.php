<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                <?php echo e($equipment->name); ?>

            </h2>

            <a href="<?php echo e(route('equipment.edit', $equipment)); ?>" class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                Editar
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <dl class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tipo</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->type); ?></dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e(ucfirst(str_replace('manutencao', 'manutenção', $equipment->status))); ?></dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Unidade</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->unit->name ?? '-'); ?></dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Departamento</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->department->name ?? '-'); ?></dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">IP</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->ip_address ?? '-'); ?></dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">MAC Address</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->mac_address ?? '-'); ?></dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Patrimônio</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->asset_tag ?? '-'); ?></dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Data de instalação</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <?php echo e($equipment->installation_date?->format('d/m/Y') ?? '-'); ?>

                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Responsável</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->responsible_name ?? '-'); ?></dd>
                    </div>

                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Observações</dt>
                        <dd class="mt-1 text-sm text-gray-900"><?php echo e($equipment->notes ?? '-'); ?></dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6">
                <a href="<?php echo e(route('equipment.index')); ?>" class="text-sm text-gray-600 hover:text-gray-900">
                    Voltar para equipamentos
                </a>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/equipment/show.blade.php ENDPATH**/ ?>