create view vw_pinjam as
select a.id, a.awal_pinjam, a.akhir_pinjam, b.nama_user, c.nama_admin, d.warna_kunci from peminjaman a
left join user b on a.user_pinjam=b.id
left join admin c on a.admin_pinjam=c.id
left join rfwarnakunci d on a.kunci_pinjam=d.id