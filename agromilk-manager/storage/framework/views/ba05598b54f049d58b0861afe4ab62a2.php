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
                Unidades
            </h2>

            <a
                href="<?php echo e(route('units.create')); ?>"
                class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700"
            >
                Nova unidade
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <?php if(session('success')): ?>
                <div class="mb-6 rounded-md bg-green-50 p-4 text-sm text-green-700">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Nome</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Tipo</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Cidade/UF</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Status</th>
                                <th class="px-4 py-3 text-right text-xs font-medium uppercase text-gray-500">Ações</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900">
                                        <?php echo e($unit->name); ?>

                                    </td>

                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        <?php echo e(ucfirst($unit->type)); ?>

                                    </td>

                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        <?php echo e($unit->city); ?>/<?php echo e($unit->state); ?>

                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        <?php if($unit->is_active): ?>
                                            <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-700">
                                                Ativa
                                            </span>
                                        <?php else: ?>
                                            <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-semibold text-red-700">
                                                Inativa
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="px-4 py-3 text-right text-sm">
                                        <div class="flex justify-end gap-3">
                                            <a href="<?php echo e(route('units.show', $unit)); ?>" class="text-gray-600 hover:text-gray-900">
                                                Ver
                                            </a>

                                            <a href="<?php echo e(route('units.edit', $unit)); ?>" class="text-indigo-600 hover:text-indigo-900">
                                                Editar
                                            </a>

                                            <form
                                                action="<?php echo e(route('units.destroy', $unit)); ?>"
                                                method="POST"
                                                onsubmit="return confirm('Deseja realmente remover esta unidade?')"
                                            >
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Remover
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">
                                        Nenhuma unidade cadastrada.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="mt-6">
                        <?php echo e($units->links()); ?>

                    </div>
                </div>
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
<?php /**PATH /var/www/html/resources/views/units/index.blade.php ENDPATH**/ ?>