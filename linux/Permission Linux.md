# Permission Linux by Bagus Aji Santoso


## Alasan Memilih Linux bagi programmer

## Command | ls -l
```
ls -l
```
* Melihat daftar file dari folder yang sedang aktif saat ini dan disertai file permissionnya

```
drwxr-xr-x
```

```
d -> directory(folder)
- -> bukan directory
r -> read
w -> write [bisa diedit]
x -> executable [bisa dijalankan sebagai program]
```
* Misalnya: ./hello.py

## Folder dan File
```
drwxr-xr-x.     Downloads
-rwxrwxrwx.     hello.py 
-rw-rw-r--.     hai.py [tidak executable] karena x permissionnya
```

```
-rwxrwxrwx. -> ada 3 block [rwx][rwx][rwx]
3 block mewakili 3 jenis perssion
ke-1 block : permission user saat ini/owner (pemilik file)
ke-2 block : permission untuk group
ke-3 block : permission selain user dan group (other)
```

## Command | whoami
```
$ whoami
```
## Command | groups
```
$ groups
```

# Mengganti Permission
```
chmod +rwx hello.py
```
* Hanya untuk rwx block pertama (3 karakter pertama) / pemilik file

# Membuang permission
```
chmod -wx hello.py 
```
-> menghapus -wx (write dan execute)

# Mengubah perssion untuk group atau other
```
$ chmod g+wr -> group
$ chmod o+wr -> other
$ chmod a=wr -> all (user, group, other)
```

# Memodifikasi Permission dengan Angka [Change Permission by Number]
- 777 -> rwx rwx rwx
- 754 -> rwx r-x r--

## Contoh
```
$ chmod 777 hello.py
$ chmod 467 hello.py    -> -r- -rw rwx
```

## By Number
```
7: rwx
6: rw-
5: r-x
4: r--
3: -wx
2: -w-
1: --x
0: --- [tidak bisa read, edit, execute filenya]
```

## folder upload: 777 (tidak sarankan)

```
NB:
Yang bisa mengubah persmission adalah pemilik filenya (user) / root (super user)

```

# Mengubah Permission Folder
```
chmod -R +wrx
```
* R -> Rekursif : folder ini dan semua yang ada di dalamnya




# REFERENCES
- Video Youtube: Mengenal File Permission di Linux Unix [Code Politan]