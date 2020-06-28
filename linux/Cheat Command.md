# Cheat Command

perintah dasar sistem operasi linux :
- Perintah informasi user (id, hostname, uname, w, who, whoami, chfn, finger)
- Perintah dasar (date, cal, man, clear, apropos, whatis)
- Perintah manipulasi file (ls, file, cat, more, pg, cp, mv, rm, grep)

# Cari tau tentang ls
```
whatis ls
```
# Manual 
```
$ man ls
```

# Cari Kegunaan/Fungsi
```
$ apropos ls
```

# Instal
```
$ apt-get install (nama aplikasi)
```

#
```
$ finger <nama_username>
$ finger uxcover
```

# Calender
```
$ cal 3 2016
```
* Bulan 3 2016
```
$ cal -y
$ cal 2018 -y
```
* Memperlihatkan kalender tahunan

# Manipulasi FIle
## Buat file dengan nano
```
$ nano <nama_file>
```

# ls
```
$ ls
$ ls -l
$ ls -a -> yang terhidden juga akan ditampilkan
$ ls -f
```

# file *
```
$ file *
$ file <nama_file.txt>
```
# Membuat File cat, nano
```
$ cat > nama_file
// keluar Ctrl+D 2x

$ nano nama_file
// keluar Ctrl+X
```


# Membuka File
## Perintah cat, more, pg
```
$ cat <nama_file.txt>
$ more <nama_file.txt>
$ pg <nama_file.txt>    // not working on may ubuntu 19
```
# Copy file
```
$ cp <nama_file.txt> <nama_baru.txt>
```
# Pindah file mv
```
$ mv <nama_file.txt> <ke_tujuan_directory>
```
# Mengubah nama file mv
```
$ mv <old_file_name> <new_file_name>
```
# Hapus
```
$ rm -r <nama_directory>
$ rm -d <nama_directory>

```

# Mencari kata dalam file
```
$ grep <keyword:kata_yg_dicari> <nama_file>

- Multi
$ grep <keyword> <nama_file_1> <nama_file_2>
```

# Cari FIle
```
$ find <path> -name "<nama_file>"
$ find Document -name "*.txt"
$ find * -name "*.txt"
```
# Mencari File yang berhubungan dengan sistem
```
$ which <nama_file>
$ which nano
//  /usr/bin/nano
```

# locate
```
$ locate <file_name>

```
# INSTALL
## Daftar Aplikasi TerInstall
```
$ dpkg --list
```

#NB
```
$ tree
$ localate

$ sudo apt install tree
$ sudo apt install mlocate

```
meminta install tambahan tree, locate

# Symbolik Link
Ada 2:
- Soft Link
- Hard Link

## hardlink
```
$ ln <nama_file> <nama_baru>
```

## Softlink
```
$ ln -s <nama_file> <nama_baru>
```