## Laravel de Redis

Redis ile Pub / Sub özelliğini kullanarak bir anlık veri işleme uygulaması yaptım. proje henüz giriş bir uygulama olmasına rağmen ileri düzey işlemler kullanılmıştır, örnek vermek gerekirse Laravel'in Job mantığı ve bu jobuda queue ile işledim, tabii bu queue redis de barınıyor.

### Ön İzleme

Yaptığım uygulamada Redis'in Pub / Sub özelliği kullanıldı. Peki nedir bu özellikler bunlar broadcast mantığında çalışan anlık veri izleyebilme yapsıdır, publisch de göndermek istediğiniz dataları gönderirsiniz ve bunu subscribe alanında izlersiniz, ne zaman publish tetiklense subscribe devreye girer.