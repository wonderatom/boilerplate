# Installation
Build and run docker images:
```shell script
make dc-up
```
Install symfony and composer packages:
```shell script
make app-install
```
Migrate DB:
```shell script
make app-run-migration
```

# Usage
Check default list of aircraft in the "Aeropakt" hangar:
http://localhost:8080/api/v1/hangars/Aeropakt/airplanes

Place random airplane into hangar:
```shell script
make app-hangar-place
```

Check changes:
http://localhost:8080/api/v1/hangars/Aeropakt/airplanes

Take out last added airplane from hangar:
```shell script
make app-hangar-take-out
```

# Tests
Run functional and unit tests:
```shell script
make app-run-test
```