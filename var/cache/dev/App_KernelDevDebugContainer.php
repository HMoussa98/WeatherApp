<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWvEdFFP\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWvEdFFP/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWvEdFFP.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWvEdFFP\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerWvEdFFP\App_KernelDevDebugContainer([
    'container.build_hash' => 'WvEdFFP',
    'container.build_id' => '702cd305',
    'container.build_time' => 1713509368,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWvEdFFP');
