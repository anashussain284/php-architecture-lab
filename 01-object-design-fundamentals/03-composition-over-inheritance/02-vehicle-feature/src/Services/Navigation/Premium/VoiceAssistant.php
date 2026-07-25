<?php
declare(strict_types=1);

namespace App\Services\Navigation\Premium;

final readonly class VoiceAssistant
{
	public function prompt(string $message): string
	{
		return "Voice Alert: '{$message}'";
	}
}