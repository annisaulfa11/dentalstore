PGDMP     !    +    
            z            dental_house_store    10.20    14.2 9    <           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            =           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            >           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    16481    dental_house_store    DATABASE     u   CREATE DATABASE dental_house_store WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
 "   DROP DATABASE dental_house_store;
                postgres    false            ?            1259    16508    barang    TABLE     %  CREATE TABLE public.barang (
    id_barang character varying(5) NOT NULL,
    nama_barang character varying(30) NOT NULL,
    id_supplier character varying(5) NOT NULL,
    stok integer NOT NULL,
    satuan character varying(50) NOT NULL,
    harga bigint NOT NULL,
    id integer NOT NULL
);
    DROP TABLE public.barang;
       public            postgres    false            ?            1259    16497    detail_kategori    TABLE     ?   CREATE TABLE public.detail_kategori (
    id integer NOT NULL,
    id_kategori character varying(5) NOT NULL,
    id_jenis integer NOT NULL,
    "desc" character varying(100)
);
 #   DROP TABLE public.detail_kategori;
       public            postgres    false            ?            1259    16495    detail_kategori_id_seq    SEQUENCE        CREATE SEQUENCE public.detail_kategori_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.detail_kategori_id_seq;
       public          postgres    false    200            @           0    0    detail_kategori_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.detail_kategori_id_seq OWNED BY public.detail_kategori.id;
          public          postgres    false    199            ?            1259    16528    detail_transaksi    TABLE     ?   CREATE TABLE public.detail_transaksi (
    id integer NOT NULL,
    no_faktur character varying(20) NOT NULL,
    id_barang character varying(5) NOT NULL,
    qty integer NOT NULL,
    total bigint NOT NULL
);
 $   DROP TABLE public.detail_transaksi;
       public            postgres    false            ?            1259    16526    detail_transaksi_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.detail_transaksi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.detail_transaksi_id_seq;
       public          postgres    false    207            A           0    0    detail_transaksi_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.detail_transaksi_id_seq OWNED BY public.detail_transaksi.id;
          public          postgres    false    206            ?            1259    16489    jenis    TABLE     l   CREATE TABLE public.jenis (
    id_jenis integer NOT NULL,
    nama_jenis character varying(30) NOT NULL
);
    DROP TABLE public.jenis;
       public            postgres    false            ?            1259    16487    jenis_id_jenis_seq    SEQUENCE     {   CREATE SEQUENCE public.jenis_id_jenis_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.jenis_id_jenis_seq;
       public          postgres    false    198            B           0    0    jenis_id_jenis_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.jenis_id_jenis_seq OWNED BY public.jenis.id_jenis;
          public          postgres    false    197            ?            1259    16482    kategori    TABLE     ?   CREATE TABLE public.kategori (
    id_kategori character varying(5) NOT NULL,
    nama_kategori character varying(30) NOT NULL
);
    DROP TABLE public.kategori;
       public            postgres    false            ?            1259    16515 	   pelanggan    TABLE     ?   CREATE TABLE public.pelanggan (
    id_pelanggan integer NOT NULL,
    nama_pelanggan character varying(20) NOT NULL,
    no_hp character varying(12) NOT NULL,
    alamat character varying(50) NOT NULL
);
    DROP TABLE public.pelanggan;
       public            postgres    false            ?            1259    16513    pelanggan_id_pelanggan_seq    SEQUENCE     ?   CREATE SEQUENCE public.pelanggan_id_pelanggan_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.pelanggan_id_pelanggan_seq;
       public          postgres    false    204            C           0    0    pelanggan_id_pelanggan_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.pelanggan_id_pelanggan_seq OWNED BY public.pelanggan.id_pelanggan;
          public          postgres    false    203            ?            1259    16503    supplier    TABLE     ?   CREATE TABLE public.supplier (
    id_supplier character varying(5) NOT NULL,
    nama_supplier character varying(50) NOT NULL,
    no_hp character varying(12) NOT NULL,
    alamat character varying(50) NOT NULL
);
    DROP TABLE public.supplier;
       public            postgres    false            ?            1259    16521 	   transaksi    TABLE     ?   CREATE TABLE public.transaksi (
    no_faktur character varying(20) NOT NULL,
    tanggal date NOT NULL,
    id_pelanggan integer NOT NULL,
    total bigint NOT NULL
);
    DROP TABLE public.transaksi;
       public            postgres    false            ?            1259    16575    users    TABLE     ?   CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(50) NOT NULL,
    level character varying(50) NOT NULL
);
    DROP TABLE public.users;
       public            postgres    false            ?            1259    16580    user_id_seq    SEQUENCE     t   CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public          postgres    false    208            D           0    0    user_id_seq    SEQUENCE OWNED BY     <   ALTER SEQUENCE public.user_id_seq OWNED BY public.users.id;
          public          postgres    false    209            ?
           2604    16500    detail_kategori id    DEFAULT     x   ALTER TABLE ONLY public.detail_kategori ALTER COLUMN id SET DEFAULT nextval('public.detail_kategori_id_seq'::regclass);
 A   ALTER TABLE public.detail_kategori ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    199    200    200            ?
           2604    16531    detail_transaksi id    DEFAULT     z   ALTER TABLE ONLY public.detail_transaksi ALTER COLUMN id SET DEFAULT nextval('public.detail_transaksi_id_seq'::regclass);
 B   ALTER TABLE public.detail_transaksi ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    206    207    207            ?
           2604    16492    jenis id_jenis    DEFAULT     p   ALTER TABLE ONLY public.jenis ALTER COLUMN id_jenis SET DEFAULT nextval('public.jenis_id_jenis_seq'::regclass);
 =   ALTER TABLE public.jenis ALTER COLUMN id_jenis DROP DEFAULT;
       public          postgres    false    197    198    198            ?
           2604    16518    pelanggan id_pelanggan    DEFAULT     ?   ALTER TABLE ONLY public.pelanggan ALTER COLUMN id_pelanggan SET DEFAULT nextval('public.pelanggan_id_pelanggan_seq'::regclass);
 E   ALTER TABLE public.pelanggan ALTER COLUMN id_pelanggan DROP DEFAULT;
       public          postgres    false    203    204    204            2          0    16508    barang 
   TABLE DATA           ^   COPY public.barang (id_barang, nama_barang, id_supplier, stok, satuan, harga, id) FROM stdin;
    public          postgres    false    202   [A       0          0    16497    detail_kategori 
   TABLE DATA           L   COPY public.detail_kategori (id, id_kategori, id_jenis, "desc") FROM stdin;
    public          postgres    false    200   ?A       7          0    16528    detail_transaksi 
   TABLE DATA           P   COPY public.detail_transaksi (id, no_faktur, id_barang, qty, total) FROM stdin;
    public          postgres    false    207   B       .          0    16489    jenis 
   TABLE DATA           5   COPY public.jenis (id_jenis, nama_jenis) FROM stdin;
    public          postgres    false    198   ?B       ,          0    16482    kategori 
   TABLE DATA           >   COPY public.kategori (id_kategori, nama_kategori) FROM stdin;
    public          postgres    false    196   ?B       4          0    16515 	   pelanggan 
   TABLE DATA           P   COPY public.pelanggan (id_pelanggan, nama_pelanggan, no_hp, alamat) FROM stdin;
    public          postgres    false    204   ?B       1          0    16503    supplier 
   TABLE DATA           M   COPY public.supplier (id_supplier, nama_supplier, no_hp, alamat) FROM stdin;
    public          postgres    false    201   tC       5          0    16521 	   transaksi 
   TABLE DATA           L   COPY public.transaksi (no_faktur, tanggal, id_pelanggan, total) FROM stdin;
    public          postgres    false    205   D       8          0    16575    users 
   TABLE DATA           >   COPY public.users (id, username, password, level) FROM stdin;
    public          postgres    false    208   sD       E           0    0    detail_kategori_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.detail_kategori_id_seq', 1, false);
          public          postgres    false    199            F           0    0    detail_transaksi_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.detail_transaksi_id_seq', 28, true);
          public          postgres    false    206            G           0    0    jenis_id_jenis_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.jenis_id_jenis_seq', 1, false);
          public          postgres    false    197            H           0    0    pelanggan_id_pelanggan_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.pelanggan_id_pelanggan_seq', 11, true);
          public          postgres    false    203            I           0    0    user_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.user_id_seq', 1, false);
          public          postgres    false    209            ?
           2606    16512    barang barang_pk 
   CONSTRAINT     U   ALTER TABLE ONLY public.barang
    ADD CONSTRAINT barang_pk PRIMARY KEY (id_barang);
 :   ALTER TABLE ONLY public.barang DROP CONSTRAINT barang_pk;
       public            postgres    false    202            ?
           2606    16502 "   detail_kategori detail_kategori_pk 
   CONSTRAINT     `   ALTER TABLE ONLY public.detail_kategori
    ADD CONSTRAINT detail_kategori_pk PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.detail_kategori DROP CONSTRAINT detail_kategori_pk;
       public            postgres    false    200            ?
           2606    16533 $   detail_transaksi detail_transaksi_pk 
   CONSTRAINT     b   ALTER TABLE ONLY public.detail_transaksi
    ADD CONSTRAINT detail_transaksi_pk PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.detail_transaksi DROP CONSTRAINT detail_transaksi_pk;
       public            postgres    false    207            ?
           2606    16494    jenis jenis_pk 
   CONSTRAINT     R   ALTER TABLE ONLY public.jenis
    ADD CONSTRAINT jenis_pk PRIMARY KEY (id_jenis);
 8   ALTER TABLE ONLY public.jenis DROP CONSTRAINT jenis_pk;
       public            postgres    false    198            ?
           2606    16486    kategori kategori_pk 
   CONSTRAINT     [   ALTER TABLE ONLY public.kategori
    ADD CONSTRAINT kategori_pk PRIMARY KEY (id_kategori);
 >   ALTER TABLE ONLY public.kategori DROP CONSTRAINT kategori_pk;
       public            postgres    false    196            ?
           2606    16520    pelanggan pelanggan_pk 
   CONSTRAINT     ^   ALTER TABLE ONLY public.pelanggan
    ADD CONSTRAINT pelanggan_pk PRIMARY KEY (id_pelanggan);
 @   ALTER TABLE ONLY public.pelanggan DROP CONSTRAINT pelanggan_pk;
       public            postgres    false    204            ?
           2606    16507    supplier supplier_pk 
   CONSTRAINT     [   ALTER TABLE ONLY public.supplier
    ADD CONSTRAINT supplier_pk PRIMARY KEY (id_supplier);
 >   ALTER TABLE ONLY public.supplier DROP CONSTRAINT supplier_pk;
       public            postgres    false    201            ?
           2606    16583    transaksi transaksi_pk 
   CONSTRAINT     [   ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT transaksi_pk PRIMARY KEY (no_faktur);
 @   ALTER TABLE ONLY public.transaksi DROP CONSTRAINT transaksi_pk;
       public            postgres    false    205            ?
           2606    16579    users user_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);
 9   ALTER TABLE ONLY public.users DROP CONSTRAINT user_pkey;
       public            postgres    false    208            ?
           1259    16594    fki_detail_kategori_barang_fk    INDEX     N   CREATE INDEX fki_detail_kategori_barang_fk ON public.barang USING btree (id);
 1   DROP INDEX public.fki_detail_kategori_barang_fk;
       public            postgres    false    202            ?
           2606    16559 +   detail_transaksi barang_detail_transaksi_fk    FK CONSTRAINT     ?   ALTER TABLE ONLY public.detail_transaksi
    ADD CONSTRAINT barang_detail_transaksi_fk FOREIGN KEY (id_barang) REFERENCES public.barang(id_barang);
 U   ALTER TABLE ONLY public.detail_transaksi DROP CONSTRAINT barang_detail_transaksi_fk;
       public          postgres    false    2723    202    207            ?
           2606    16589     barang detail_kategori_barang_fk    FK CONSTRAINT     ?   ALTER TABLE ONLY public.barang
    ADD CONSTRAINT detail_kategori_barang_fk FOREIGN KEY (id) REFERENCES public.detail_kategori(id);
 J   ALTER TABLE ONLY public.barang DROP CONSTRAINT detail_kategori_barang_fk;
       public          postgres    false    202    200    2719            ?
           2606    16544 (   detail_kategori jenis_detail_kategori_fk    FK CONSTRAINT     ?   ALTER TABLE ONLY public.detail_kategori
    ADD CONSTRAINT jenis_detail_kategori_fk FOREIGN KEY (id_jenis) REFERENCES public.jenis(id_jenis);
 R   ALTER TABLE ONLY public.detail_kategori DROP CONSTRAINT jenis_detail_kategori_fk;
       public          postgres    false    200    198    2717            ?
           2606    16534 +   detail_kategori kategori_detail_kategori_fk    FK CONSTRAINT     ?   ALTER TABLE ONLY public.detail_kategori
    ADD CONSTRAINT kategori_detail_kategori_fk FOREIGN KEY (id_kategori) REFERENCES public.kategori(id_kategori);
 U   ALTER TABLE ONLY public.detail_kategori DROP CONSTRAINT kategori_detail_kategori_fk;
       public          postgres    false    196    200    2715            ?
           2606    16564     transaksi pelanggan_transaksi_fk    FK CONSTRAINT     ?   ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT pelanggan_transaksi_fk FOREIGN KEY (id_pelanggan) REFERENCES public.pelanggan(id_pelanggan);
 J   ALTER TABLE ONLY public.transaksi DROP CONSTRAINT pelanggan_transaksi_fk;
       public          postgres    false    205    2726    204            ?
           2606    16554    barang supplier_barang_fk    FK CONSTRAINT     ?   ALTER TABLE ONLY public.barang
    ADD CONSTRAINT supplier_barang_fk FOREIGN KEY (id_supplier) REFERENCES public.supplier(id_supplier);
 C   ALTER TABLE ONLY public.barang DROP CONSTRAINT supplier_barang_fk;
       public          postgres    false    201    2721    202            2   E   x?s4000?tJ??TH?I,?tNS?Ҽ?NCS?,?!?#?2?tI?+I?Q(N??2??? ?b???? )x      0   F   x?3?t?4????22?@CNG?Hf^qIQinj?Bini???BAjQbNbIb?P??????d? ?YE      7   |   x?uλ?0Eњ?%???ʴ?2@??#???"?	??ы?AB??фK?RP??b?x)QJ??K{A?B??=????!f?m??씼??6&??!?
\??~R?	????/	ɸ????????@?F"      .      x?3?tJ?H??2?H-J?I,?c???? Z??      ,   ,   x?s???+.)*?M?S?-??r??/*??O??+?L?????? ??h      4   g   x?3?t)?SH??ML??4?0527145167?HLI?K??2?p̃I?????A???!?EYcK?c????Č?<?????".CC?-I?U`W?)F??? H?,B      1   ?   x???
?0 ????)???m?^?
MJ?zts J? |????????+?m??????|iz'R}?I???<?E=)xN9??ȅ???74A?`????HY?mW??$??&??Xm??o
]?l?#w(Gt??ŕ򩤔??b(?      5   T   x?U??? ?w?Ub'???t?9J?
??<?_%IP`@?,Hq??h???
ͥ?3|)M(?3&??6??׉?[???Ǽއ?>@??      8   r   x??A
?0ѵ|?b}Yvt?ndˆ?B?????,z?yQcZ?k?Z'?j`B????????f̾ģóh?f?5????????O???k?wފlV<??[?5?$=)?Y?!?     