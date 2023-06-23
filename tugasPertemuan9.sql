CREATE TABLE `role` (
  `id_role` int PRIMARY KEY,
  `nama` varchar(20)
);

CREATE TABLE `user` (
  `id_user` int PRIMARY KEY,
  `id_role` int,
  `nama_lengkap` varchar(100),
  `email` varchar(100),
  `password` varchar(10)
);

CREATE TABLE `kegiatan` (
  `id_kegiatan` int PRIMARY KEY,
  `id_user` int,
  `kegiatan` varchar(250),
  `tanggal` timestamp DEFAULT (now()),
  `acc` boolean DEFAULT (false)
);

CREATE TABLE `divisi` (
  `id_divisi` int PRIMARY KEY,
  `id_ketua_divisi` int,
  `id_user` int
);

ALTER TABLE `user` ADD FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

ALTER TABLE `kegiatan` ADD FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

ALTER TABLE `divisi` ADD FOREIGN KEY (`id_ketua_divisi`) REFERENCES `user` (`id_user`);

ALTER TABLE `divisi` ADD FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
