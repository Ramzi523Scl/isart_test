<?php

namespace App\Traits;

use Illuminate\Support\Str;


trait ModelTools
{
	public static function getUniqueLink($string, $id = null): ?string
	{
		if (!isset($string)) {
			return null;
		}

		$link = Str::slug($string);

		$existingSlugs = self::withTrashed()->where('link', 'LIKE', $link . '%')
			->when($id, function ($query, $id) {
				return $query->where('id', '!=', $id);
			})
			->pluck('link')
			->toArray();

		if (in_array($link, $existingSlugs)) {
			$i = 1;
			while (in_array($link . '-' . $i, $existingSlugs)) {
				$i++;
			}
			$link .= '-' . $i;
		}

		return $link;
	}

	public static function getUniqueUuid(): string
	{
		do {
			$uuid = Str::uuid()->toString();
		} while (self::whereUuid($uuid)->exists());

		return $uuid;
	}

}
