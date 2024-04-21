## Laravel de Redis

Redis ile Pub / Sub özelliğini kullanarak bir anlık veri işleme uygulaması yaptım. proje henüz giriş bir uygulama olmasına rağmen ileri düzey işlemler kullanılmıştır, örnek vermek gerekirse Laravel'in Job mantığı, jobuda queue ile işledim, tabii bu queue redis de barınıyor.

### Ön İzleme

Yaptığım uygulamada Redis'in Pub / Sub özelliği kullanıldı. Peki nedir bu özellikler bunlar broadcast mantığında çalışan anlık veri izleyebilme yapsıdır, publish de göndermek istediğiniz dataları gönderirsiniz ve bunu subscribe alanında izlersiniz, ne zaman publish tetiklense subscribe devreye girer.

```
    public function publish() 
    {
        Redis::publish('test-channel', json_encode([
            'name' => 'Hasan Basri Akcıl'
        ]));
    }
````

Yukarıda görmüş olduğunuz kod parçası yapımızın ilk adımı olan veriyi paylaşabilme alanıdır. burada ilk parametre olarak kanalın ismini veriyoruz, ardından da ikinci bir parametre olarak da paylaşmak istediğimiz datayı veriyoruz.


````
    public function handle(): void
    {
        Redis::subscribe(['test-channel'], function ($message) {
            return $message['name'];
        });
    }
````

Burdaki kod parçası ise paylaştığımız datayı izleyebileceğimiz subscribe methodu kullanıyoruz. Burda da ilk parametre olarak da izleceğimiz kanalı yazıyoruz ve ikinci adımda da bir closure fonksiyon yazıyoruz fakat burda boş bırakıp geçmiyoruz scope alanına gelecek olan verinin değişkenini belirtiyoruz.