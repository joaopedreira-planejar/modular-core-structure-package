<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module structure';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $moduleName = ucFirst($name);

        $basePath = base_path("modules/{$moduleName}");

        if(File::exists($basePath)) {
            $this->error("Module {$moduleName} already exists!");
            return;
        }

        File::makeDirectory($basePath . '/routes', 0755, true);
        File::makeDirectory($basePath . '/database/migrations', 0755, true);
        File::makeDirectory($basePath . '/Http/Controllers', 0755, true);
        File::makeDirectory($basePath . '/Models', 0755, true);
        File::makeDirectory($basePath . '/Providers', 0755, true);
        File::makeDirectory($basePath . '/resources/views', 0755, true);

        File::put($basePath . '/routes/web.php', "<?php\n\nuse Illuminate\Support\Facades\Route;\n\nRoute::prefix('" . strtolower($name) . "')->group(function () {\n    Route::get('/', function () {\n        return '" . $moduleName . " module works!';\n    });\n});\n");

        $providerTemplate = $this->getProviderTemplate($moduleName);
        File::put($basePath . "/Providers/{$moduleName}ServiceProvider.php", $providerTemplate);

        $this->info("Module {$moduleName} created successfully!");
    }

    protected function getProviderTemplate(string $moduleName): string
    {
        return <<<PHP
        <?php

        namespace Modules\\{$moduleName}\Providers;

        use Modules\Core\Providers\ModuleServiceProvider;

        class {$moduleName}ServiceProvider extends ModuleServiceProvider
        {

            public function __construct(\$app)
            {
                 parent::__construct(\$app);
                 \$this->modulePath = dirname(__DIR__, 1);
            }

            public function register() {}

            public function boot()
            {
                \$this->loadRoutes();
                \$this->loadMigrations();
            }
        }
        PHP;
    }

}
