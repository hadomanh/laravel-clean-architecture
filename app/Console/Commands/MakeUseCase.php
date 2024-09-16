<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeUseCase extends Command
{
    protected $signature = 'make:use-case {name}';

    protected $description = 'Make Use-case to implement Clean Architecture';

    public function handle() {
        $useCase = $this->argument('name');

        if (File::exists(app_path("UseCases/{$useCase}"))) {
            if (!$this->confirm('This use-case already exists. Do you want to overwrite it?')) {
                return 1;
            }
        }
        
        $components = ['InputPort', 'OutputPort', 'RequestModel', 'ResponseModel', 'UseCase'];

        foreach ($components as $component) {
            $this->generateFile($component, $useCase);
        }

        return 0;
    }

    private function generateFile(string $component, string $useCase) {
        $templatePath = app_path("UseCases/.template/{$component}.php");
        $renderedContent = str_replace("Template", str_replace("/", "\\", $useCase), File::get($templatePath));

        if (!File::exists(app_path("UseCases/{$useCase}"))) {
            File::makeDirectory(app_path("UseCases/{$useCase}"), 0755, true);
        }

        $targetPath = app_path("UseCases/{$useCase}/{$component}.php");
        File::put($targetPath, $renderedContent);
        
        $this->info("{$useCase} - {$component} generated successfully");
    }
}
