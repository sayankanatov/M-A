<?xml version="{{$xmlVersion}}" encoding="UTF-8"?>
<urlset
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
{{-- PRIORITY 1.00 START --}}
<url>
  <loc>{{$urls['main']}}</loc>
  <lastmod>{{$now}}</lastmod>
  <priority>1.00</priority>
</url>

@if(isset($cities))

@foreach($cities as $city)
<url>
  <loc>{{$urls['main']}}/{{$city->alias}}</loc>
  <lastmod>{{$now}}</lastmod>
  <priority>1.00</priority>
</url>
@endforeach
{{-- PRIORITY 1.00 END --}}

{{-- PRIORITY 0.90 START --}}
@foreach($cities as $city)
<url>
  <loc>{{$urls['main']}}/{{$city->alias}}/{{$urls['companies']}}</loc>
  <lastmod>{{$now}}</lastmod>
  <priority>0.90</priority>
</url>
<url>
  <loc>{{$urls['main']}}/{{$city->alias}}/{{$urls['lawyers']}}</loc>
  <lastmod>{{$now}}</lastmod>
  <priority>0.90</priority>
</url>
@endforeach

@endif

@if(isset($cities) && isset($services))
@foreach($cities as $city)
@foreach($services as $service)
<url>
  <loc>{{$urls['main']}}/{{$city->alias}}/{{$urls['service']}}/{{$service->alias}}</loc>
  <lastmod>{{$now}}</lastmod>
  <priority>0.90</priority>
</url>
@endforeach
@endforeach
@endif
{{-- PRIORITY 0.90 END --}}

{{-- PRIORITY 0.80 START --}}
@if(isset($cities))

@foreach($cities as $city)
@foreach($city->lawyers as $lawyer)
<url>
  <loc>{{$urls['main']}}/{{$city->alias}}/{{$urls['lawyer']}}/{{$lawyer->alias}}</loc>
  <lastmod>{{$lawyer->updated_at->toAtomString()}}</lastmod>
  <priority>0.80</priority>
</url>
@endforeach
@endforeach

@foreach($cities as $city)
@foreach($city->companies as $company)
<url>
  <loc>{{$urls['main']}}/{{$city->alias}}/{{$urls['company']}}/{{$company->alias}}</loc>
  <lastmod>{{$company->updated_at->toAtomString()}}</lastmod>
  <priority>0.80</priority>
</url>
@endforeach
@endforeach
{{-- PRIORITY 0.80 END --}}
@endif

</urlset>