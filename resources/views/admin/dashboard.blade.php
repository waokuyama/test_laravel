{{-- 管理者用トップページ --}}
{{-- 今日の日付xx日で取得 --}}
<div><?php $day = date('d'); ?></div>

{{-- JavaScriptにデータの送信 --}}
<script>
const weekDay = {!! json_encode($week_day) !!};
const weekTotal = {!! json_encode($week_total) !!};
</script>


<head>
  <title>Chart Example</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="{{ asset('js/chartjs.js') }}"></script> 

</head>
<x-admin_header></x-admin_header>


<main>
    {{-- コード試し --}}
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap justify-center -m-4">
          <div class="p-4 md:w-3/4">
            <div class="h-full overflow-hidden border-2 border-gray-200 rounded-lg border-opacity-60">
              <canvas id="myChart1" style="height: 100px;"></canvas>
              <div class="p-6">
                <h1 class="mb-3 text-lg font-medium text-gray-900 title-font">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">{{ ($day) }}日のお問い合わせ状況</font>
                  </font>
                </h1>
                <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">
                  <font style="vertical-align: inherit;">
                    <div class="grid grid-cols-2 gap-2 place-items-stretch">
                    <font style="vertical-align: inherit;">受信数合計</font>
                    <a class="">{{ ($status[0] ?? 0) + ($status[1] ?? 0) + ($status[2] ?? 0) }}件</a>
                    </div>
                  </font>
                </h2>
                
                <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">
                  <font style="vertical-align: inherit;">
                    <div class="grid grid-cols-2 gap-2 place-items-stretch">
                    <font style="vertical-align: inherit;">新着件数</font>
                    <a class="">{{ $status[0] ?? 0 }}件</a>
                    </div>
                  </font>
                </h2>
                
                <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">
                  <font style="vertical-align: inherit;">
                    <div class="grid grid-cols-2 gap-2 place-items-stretch">
                    <font style="vertical-align: inherit;">対応中件数</font>
                    <a class="">{{ $status[1] ?? 0 }}件</a>
                    </div>
                  </font>
                </h2>

                <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">
                  <font style="vertical-align: inherit;">
                    <div class="grid grid-cols-2 gap-2 place-items-stretch">
                    <font style="vertical-align: inherit;">対応済件数</font>
                    <a class="">{{ $status[2] ?? 0 }}件</a>
                    </div>
                  </font>
                </h2>

                <p class="my-3 leading-relaxed">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">今月の受信数</font>
                  </font>
                </p>

                <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">
                  <font style="vertical-align: inherit;">
                    <div class="grid grid-cols-2 gap-2 place-items-stretch">
                    <font style="vertical-align: inherit;">受信数合計</font>
                    <a class="">{{ $month_totle }}件</a>
                    </div>
                  </font>
                </h2>

                <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">
                  <font style="vertical-align: inherit;">
                    <div class="grid grid-cols-2 gap-2 place-items-stretch">
                    <font style="vertical-align: inherit;">最多受信日</font>
                    <a class="">{{ ($month_max->date) }}日</a>
                    </div>
                  </font>
                </h2>

                <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">
                  <font style="vertical-align: inherit;">
                    <div class="grid grid-cols-2 gap-2 place-items-stretch">
                    <font style="vertical-align: inherit;">最多受信数</font>
                    <a class="">{{ ($month_max->count) }}件</a>
                    </div>
                  </font>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
<x-admin_footer></x-admin_footer>