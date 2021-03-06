## 請簡單解釋什麼是 Single Page Application

簡單來說，寫到極致的 client side render 就是 SPA。也就是說 server 後端只專注在提供資料，即只輸出 JSON 格式的資料而已（資料不一定要是 JSON 格式，只是這個格式是最常見的），也可說是後端提供一個 API 出來。而 Browser 前端，只需要一個檔案`index.html`就可以了。

## SPA 的優缺點為何

SPA 的最大的優點就是使用者體驗很棒，因為使用者用起來不會有換頁的問題，這感覺會很像在手機上使用 App 的感覺差不多。最大的缺點則是，前端會變得很複雜，會需要很多次的 AJAX，因為每向後端要一次資料就要發一次非同步 AJAX 來處理，還有需要再處理 SEO 的問題。
