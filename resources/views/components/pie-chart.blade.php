@php
    $size = $size ?? 100;
    $center = $size / 2;
    $radius = $radius ?? 45;
    $value = $value ?? 0;
    $max = $max ?? 100;
    $unit = $unit ?? '';
    $colorClass = $colorClass ?? 'purple';
    $strokeClass = $strokeClass ?? 'stroke-purple';
    $fillClass = $fillClass ?? 'fill-purple';

    $circumference = 2 * pi() * $radius;
    $offset = $circumference * (1 - $value / $max);
@endphp

<div {{ $attributes->merge(['class' => 'pie-chart-box']) }}>
    <div class="pie-chart-wrapper">
        <svg
            class="pie-chart"
            viewBox="0 0 {{ $size }} {{ $size }}"
            width="100%"
            height="100%"
            preserveAspectRatio="xMidYMid meet"
        >
            <circle
                class="bg"
                cx="{{ $center }}" cy="{{ $center }}" r="{{ $radius }}"
            />
            <circle
                class="value {{ $strokeClass }}"
                cx="{{ $center }}" cy="{{ $center }}" r="{{ $radius }}"
                stroke-dasharray="{{ $circumference }}"
                stroke-dashoffset="{{ $offset }}"
                stroke-linecap="round"
                transform="rotate(-90 {{ $center }} {{ $center }})"
            />
            <text class="{{ $fillClass }}" x="{{ $center }}" y="{{ $center }}">
                {{ $value }}{{ $unit }}
            </text>
        </svg>
    </div>
    <div class="pie-chart-title {{ $colorClass }}">
        <p>{{ $title }}</p>
    </div>
</div>